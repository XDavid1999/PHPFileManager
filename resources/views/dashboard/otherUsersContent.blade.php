<div class="outlined">
    <h2 class="pt-3 text-center">Other's Content</h2>
    <div class="w-25 container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                </tr>
            </thead>
            <tbody>
                @if (count($users) > 0)
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th scope="row"></th>
                        <td>No Data Available</td>
                        <td></td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
