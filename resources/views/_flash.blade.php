@if (isset($flash))
    @foreach ($flash as $_)
        <div class="bs-component">
            <div class="alert alert-dismissible alert-{{ $_['level'] }}">
                <button type="button" class="close" data-dismiss="alert">
                    ×
                </button>
                <h4>
                    {{ $_['title'] }}
                </h4>
                <p>
                    {{ $_['msg'] }}
                </p>
            </div>
        </div>
    @endforeach
    @php App()->request->session()->forget('flash'); @endphp
@endif