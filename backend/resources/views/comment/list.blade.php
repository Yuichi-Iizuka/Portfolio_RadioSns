@if($program->comments->isEmpty())
<div class="container">
  <div class="row">
    <div class="col-md mb-4">
      <div class="card">
        <div class="card-body">
          <p>コメントなし</p>
        </div>
      </div>
    </div>
  </div>
</div>
@else
@foreach($program->comments as $comment)
@include('comment.card')
@endforeach
@endif