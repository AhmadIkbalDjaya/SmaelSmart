<div class="container-fluid box1 py-2">
  <h3>Pengumuman</h3>
  @if ($active_announcement != 'none')
    <h5>{{ $active_announcement->title }}</h5>
    <p>{{ $active_announcement->content }}</p>
  @else
    <p class="card-subtitle">Tidak Ada Pengumuman Terbaru</p>
  @endif
  {{-- <h5>Judul Pengumuman</h5>
  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequatur ea tempora quasi! Quam impedit voluptatibus reiciendis repellat cum assumenda, ipsa odit ducimus. Neque laboriosam fugiat odit perferendis nam nemo molestias!</p> --}}
</div>