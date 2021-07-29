<tr>
    <td ng-bind-html="item.icon" class="f20">
        <i class="md md-done darken-2 icon-color"></i>
    </td>
    <td>
        @if (isset($item->status_transitions, $item->status_transitions->finalized_at))
        {{ strftime('%e/%m/%y', $item->status_transitions->finalized_at) }}
        @elseif (isset($item->created))
        {{ strftime('%e/%m/%y', $item->created) }}
        @else
        @endif
    </td>
    <td>
        @if (isset($item->receipt_number))
        {{ $item->receipt_number  }}
        @else
        {{ __('labels.accountPayments.na') }}
        @endif
    </td>
    <td>
        <span>
            {{ strtoupper($item->currency) }}
        </span>
        <span>
            @if (isset($item->total))
            {{ number_format($item->total / 100, 2) }}
            @elseif (isset($item->amount))
            {{ number_format($item->amount / 100, 2) }}
            @else
            @endif
        </span>
    </td>
    <td>
        @if ($item->status === 'created')
        <a class="btn btn-info btn-flat btn-xs" href="" target="_blank">
            {{ __('labels.accountPayments.pending') }}
        </a>
        @elseif ($item->status === 'paid')
        <a class="btn btn-success btn-flat btn-xs" href="{{ $item->hosted_invoice_url  }}" target="_blank" data-placement="right" title="" data-content="You found me!" data-toggle="popover" data-trigger="hover" data-original-title="On the Right!">
            {{ __('labels.accountPayments.invoice') }}
        </a>
        @elseif ($item->status === 'succeeded')
        <a class="btn btn-success btn-flat btn-xs" href="{{ $item->receipt_url  }}" target="_blank" data-placement="right" title="" data-content="The payment was successful, click on the button to download the receipt." data-toggle="popover" data-trigger="hover" data-original-title="The charge has been executed">
            {{ __('labels.accountPayments.receipt') }}
        </a>
        @elseif ($item->status === 'refunded')
        @elseif ($item->status === 'failed')
        <a class="btn btn-danger btn-flat btn-xs" href="{{ $item->receipt_url  }}" target="_blank" data-placement="right" title="" data-content="The payment has been rejected. We will keep trying to execute it for the next 3 days before suspending the related services." data-toggle="popover" data-trigger="hover" data-original-title="The automatic charge has failed">
            {{ __('labels.accountPayments.failed') }}
        </a>
        @else
        @endif
    </td>
</tr>