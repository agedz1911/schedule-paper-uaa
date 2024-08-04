<div>
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-3 py-2 px-1">
        @foreach ($workshops as $workshop)
        <div class="card bg-base-100 w-full max-w-3xl shadow-lg hover:shadow-md hover:shadow-green-200 hover:sha">
            <figure>
                {{-- {{ dd($workshop->flyer) }} --}}
                {{-- <img src="storage/workshop/01J49VJGVG0QX0MH1HZS48S6VR.jpg" class="w-full object-cover"
                    alt="{{$workshop->code}}" /> --}}
                @if($workshop->flyer)
                <img src="{{ asset('storage/' . $workshop->flyer) }}" alt="Flyer" />
                @else
                <p>{{ $workshop->code }}</p>
                @endif
            </figure>
            <div class="card-body">
                <h2 class="card-title">
                    {{$workshop->name}}
                    <div class="badge badge-outline">{{$workshop->code}}</div>
                </h2>
                <div class="text-slate-600">
                    <p><span class="font-semibold"> Sponsor/Organizer:</span> {{$workshop->sponsor}}</p>
                    <p><span class="font-semibold">Quota: </span>{{$workshop->quota}}</p>
                </div>
                <div class="divider"></div>
                <p class="text-justify truncate text-slate-500">{{$workshop->description}}</p>
                <div class="card-actions justify-end items-center">
                    @if($workshop->status === 'Available')
                    <div class="badge badge-success font-semibold py-3 text-white">{{$workshop->status}}</div>
                    @elseif ($workshop->status === 'Limited Seats Left')
                    <div class="badge badge-warning font-semibold py-3 text-white">{{$workshop->status}}</div>
                    @else
                    <div class="badge badge-error font-semibold py-3 text-white ">{{$workshop->status}}</div>
                    @endif
                    <button class="btn" onclick="showDetailModal({{$loop->iteration}})">View Detail</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- You can open the modal using ID.showModal() method -->
    @foreach ($workshops as $workshop)
    <dialog id="my_modal_{{$loop->iteration}}" class="modal">
        <div class="modal-box w-full max-w-5xl">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <div class="card lg:card-side bg-base-100 shadow-md">
                <figure class="w-full max-w-md">
                    @if($workshop->flyer)
                    <img src="{{ asset('storage/' . $workshop->flyer) }}" alt="Flyer" />
                    @else
                    <p>{{ $workshop->code }}</p>
                    @endif
                </figure>
                <div class="card-body">
                    <h2 class="card-title">{{$workshop->name}} </h2>
                    <div class="flex flex-row justify-between">
                        <div class="badge badge-success text-white">{{$workshop->code}}</div>
                        @if($workshop->status === 'Available')
                        <div class="badge badge-success font-semibold py-3 text-white">{{$workshop->status}}</div>
                        @elseif ($workshop->status === 'Limited Seats Left')
                        <div class="badge badge-warning font-semibold py-3 text-white">{{$workshop->status}}</div>
                        @else
                        <div class="badge badge-error font-semibold py-3 text-white ">{{$workshop->status}}</div>
                        @endif
                    </div>
                    <p>{{ \Carbon\Carbon::parse($workshop->date)->format('l, j F Y') }} <br>
                        <span class="font-semibold"> Sponsor/Organizer:</span> {{$workshop->sponsor}} <br>
                        <span class="font-semibold">Quota: </span>{{$workshop->quota}}
                    </p>
                    <div class="card-actions justify-end">
                        <a href="{{$workshop->url}}" class="btn btn-warning"> Add Workshops</a>
                    </div>
                </div>
            </div>
            <div class="mt-5 flex flex-col gap-3 px-5">
                <h4 class="font-semibold text-lg">Description</h4>
                <p class="text-justify">{{$workshop->description}}</p>
                <h4 class="font-semibold text-lg">Schedule</h4>
                @foreach($workshop->schedule as $schedule)
                <img src="{{ asset('storage/' . $schedule) }}" class="w-full max-w-xl rounded-md text-center shadow-lg"
                    alt="Album" />
                @endforeach
            </div>
            <div class="modal-action">
                <form method="dialog">
                    <!-- if there is a button, it will close the modal -->
                    <button class="btn">Close</button>
                </form>
            </div>
        </div>
    </dialog>
    @endforeach
</div>

<script>
    function showDetailModal(iteration) {
        const modal = document.getElementById(`my_modal_${iteration}`);
        if (modal) {
            modal.showModal(); // Menampilkan modal
        }
    }
</script>