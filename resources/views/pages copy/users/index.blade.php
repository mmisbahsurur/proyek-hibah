<p>halaman user</p>
@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/prismjs/prism.css') }}" rel="stylesheet" />
@endpush

@section('content')
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#varyingModal" data-bs-whatever="@mdo">Open modal for @mdo</button>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#varyingModal" data-bs-whatever="@fat">Open modal for @fat</button>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#varyingModal" data-bs-whatever="@getbootstrap">Open modal for @getbootstrap</button>

<div class="modal fade" id="varyingModal" tabindex="-1" aria-labelledby="varyingModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="varyingModalLabel">New message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/prismjs/prism.js') }}"></script>
  <script src="{{ asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
@endpush
