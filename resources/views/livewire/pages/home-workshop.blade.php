<div class="bg-slate-100">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 px-2 pt-1">
        @foreach ($workshops as $workshop)

        <div class="card bg-base-100 w-full max-w-2xl shadow-sm hover:shadow-lg hover:shadow-amber-100">
            <div class="card-body">
                <div class="flex flex-row gap-4">
                    <div class="flex flex-col items-center gap-2">
                        <div class="rounded-full bg-green-50 p-2 ring ring-green-100 ring-offset-2">
                            <p class="text-2xl text-success">{{\Carbon\Carbon::parse($workshop->date)->format('d')}}</p>
                        </div>
                        <p class="font-semibold text-success uppercase">
                            {{\Carbon\Carbon::parse($workshop->date)->format('M')}}</p>
                    </div>
                    <div class="font-semibold">
                        <p class="text-lg font-semibold ">{{$workshop->name}} - ({{$workshop->code}})</p>
                        <p><span class=" text-slate-500"> Sponsor/Organizer:</span> {{$workshop->sponsor}}</p>
                        <p><span class=" text-slate-500">Quota: </span>{{$workshop->quota}}</p>
                        <div class="mt-5">
                            @if($workshop->status === 'Available')
                            <div class="badge badge-success badge-outline font-semibold py-3 text-white">
                                {{$workshop->status}}</div>
                            @elseif ($workshop->status === 'Limited Seats Left')
                            <div class="badge badge-warning badge-outline font-semibold py-3 text-white">
                                {{$workshop->status}}</div>
                            @else
                            <div class="badge badge-error badge-outline font-semibold py-3 text-white ">
                                {{$workshop->status}}</div>
                            @endif
                            <button class="btn" onclick="showDetailModal({{$loop->iteration}})">View Detail</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

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