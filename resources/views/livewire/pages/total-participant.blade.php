<div>
    <div class="overflow-x-auto">
        <table class="table table-zebra">
            <!-- head -->
            <thead>
                <tr class="text-xl font-bold">
                    <th>#</th>
                    <th>Association / Country</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($totals as $total)
                    <tr class="text-lg">
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $total->country }}</td>
                        <td class="font-bold">{{ $total->total }}</td>
                        <td>Delegates</td>
                    </tr>
                @endforeach
                    <tr class="text-xl font-bold">
                        <td colspan="2" class="text-end ">Total Delegates</td>
                        <td>2572</td>
                        <td>Delegates</td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>
