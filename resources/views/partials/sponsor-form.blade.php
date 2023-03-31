<h3 class="mt-5 mb-5 fw-bold text-uppercase text-center">{{ $title }}</h3>

@foreach ($sponsors as $sponsor)

@if ($sponsor->id != 1)
<div class="mb-4 row">
    <label class="col-md-4 col-form-label text-md-right title">{{ $sponsor->type }}
        {{-- add the calc to show how much the doctor will save from basic --}}
        @if ($sponsor->id >= 3)
        -
        <span class="price">
            @if ($sponsor->id == 4)
            Recommended 
            @endif
            save 
            <span class="price-box discount">
                ${{($sponsors[1]->price * ($sponsor->duration / 24)) - $sponsor->price}}
            </span>
        </span>
        @endif
    </label>
    <p class="col-md-6 col-form-label m-0">This user has the priviledge to appear in home as Recommended Doctor for {{$sponsor->duration}} hours</p>
    <div class="col-12 mt-3">
        <a href="{{ route('payment', ['sponsor' => $sponsor]) }}" class="btn doc-btn w-100">Buy <span class="title">{{$sponsor->type}}</span> just for ${{$sponsor->price}}</a>
    </div>
</div>
@endif

@endforeach