<?php

namespace App\Http\Controllers;

use App\Services\SendEmailService;
use App\Services\ValidateEmailService;
use Illuminate\Http\Request;
use Validator;

/**
 * Class ContactController
 *
 * @package App\Http\Controllers
 */
class ContactController extends Controller
{

    /**
     * @param           $locale
     * @param  Request  $request
     *
     * @return mixed
     */
    public function contact($locale, Request $request)
    {
        $response = view('contact', ['meta' => __('meta.contact')]);
        if ($request->isMethod('post')) {
            $attrs = $request->all();
            if (isset($attrs['form-id'])) {
                if ($attrs['form-id'] === 'subscribe') {
                    $this->formSubscribe($locale, $response, $attrs);
                } elseif ($attrs['form-id'] === 'enquiry') {
                    $this->formEnquiry($locale, $response, $attrs);
                } else {
                    abort(404);
                }
            } else {
                abort(404);
            }
        }
        return $response;
    }

    /**
     * @param $locale
     * @param $response
     * @param $attrs
     *
     * @return bool|null
     */
    protected function formSubscribe($locale, $response, $attrs)
    {
        $validator = Validator::make(
            $attrs, [
            'email' => 'required|email|max:64'
        ]
        );
        if ($validator->fails()) {
            $response = abort(404);
        } else {
            unset($_POST);
            $response = ValidateEmailService::run($attrs['email']);
            if ($response === null) {
                HelperFlash(['serviceDown']);
            } else {
                if (!$response) {
                    HelperFlash(['verifyEmailFail']);
                } else {
                    $attrs['locale'] = $locale;
                    $view = HelperEmailSanitizeView(
                        view('emails.userSubscribe', $attrs)->render()
                    );
                    $to_addrs = Config()->get('mail.from.address').';'
                        .$attrs['email'];
                    $response = SendEmailService::run(
                        $to_addrs, __('labels.email.title'), $view, '.'
                    );
                    if ($response === null) {
                        HelperFlash(['serviceDown']);
                    } else {
                        if (!$response) {
                            HelperFlash(['appError']);
                        } else {
                            HelperFlash(['subscribeSuccess']);
                        }
                    }
                }
            }
        }
        return $response;
    }

    /**
     * @param $locale
     * @param $response
     * @param $attrs
     *
     * @return bool|null
     */
    protected function formEnquiry($locale, $response, $attrs)
    {
        $validator = Validator::make(
            $attrs, [
            'whatFor' => 'required|max:32',
            'name'    => 'required|max:32',
            'email'   => 'required|email|max:64',
            'details' => 'required|max:255'
        ]
        );
        if ($validator->fails()) {
            $response = abort(404);
        } else {
            unset($_POST);
            $response = ValidateEmailService::run($attrs['email']);
            if ($response === null) {
                HelperFlash(['serviceDown']);
            } else {
                if (!$response) {
                    HelperFlash(['verifyEmailFail']);
                } else {
                    $attrs['locale'] = $locale;
                    $view = HelperEmailSanitizeView(
                        view('emails.contactEnquiry', $attrs)->render()
                    );
                    $to_addrs = Config()->get('mail.from.address');
                    $response = SendEmailService::run(
                        $to_addrs, __('labels.email.title'), $view, '.'
                    );
                    if ($response === null) {
                        HelperFlash(['serviceDown']);
                    } else {
                        if (!$response) {
                            HelperFlash(['appError']);
                        } else {
                            HelperFlash(['contactEnquirySuccess']);
                        }
                    }
                }
            }
        }
        return $response;
    }

}

?>