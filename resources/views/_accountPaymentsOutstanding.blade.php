 @php //-dd($item) @endphp
 <tr>
     <td ng-bind-html="item.icon" class="f20">
         <i class="md md-error darken-2 icon-color"></i>
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
         {{ $item->number }}
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
         @if ($item->status === 'open')
         <a class="btn btn-danger btn-flat btn-xs" href="{{ $item->hosted_invoice_url  }}" target="_blank" data-placement="right" title="" data-content="You found me!" data-toggle="popover" data-trigger="hover" data-original-title="On the Right!">
             @if (time() > $item->due_date)
             {{ __('labels.accountPayments.pastDue') }}
             @else
             {{ __('labels.accountPayments.pay') }}
             @endif
         </a>
         @elseif ($item->status === 'uncollectible')
         @else
         @endif
     </td>
 </tr>