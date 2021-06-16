@if($program->isEmpty())
<div class="container">
  <div class="row">
    <div class="col-md mb-4">
      <div class="card">
        <div class="card-body text-center">
          <p class="card-text">投稿した番組はありません</p>
        </div>
      </div>
    </div>
  </div>
</div>
@else
@foreach($program as $program)
@include('program.card')
@endforeach
@endif