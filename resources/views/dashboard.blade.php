<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <x-button target="_blank" href="https://github.com/muhammadabad/logAuditor" variant="black"
                class="items-center max-w-xs gap-2">
                <x-icons.github class="w-6 h-6" aria-hidden="true" />
                <span>Star on Github</span>
            </x-button>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
    @if(auth()->user()->user_type == 'user')
        <strong>Welcome, You are logged in at {{ @$login_time->created_at }}</strong> <br/>
    @else
        <table>
            <tr>
                <th>Authenticable Type</th>
                <th>Authenticable ID</th>
                <th>IP Address</th>
                <th>User agent</th>
                <th>Login At</th>
                <th>Logout at</th>
            </tr>
            @foreach($logs as $log)
            <tr>
                <td>{{ $log->authenticable_type }}</td>
                <td>{{ $log->authenticable_id}}</td>
                <td>{{ $log->ip_address}}</td>
                <td>{{ $log->agent_details}}</td>
                <td>{{ $log->created_at}}</td>
                <td>{{ $log->updated_at==$log->created_at?'':$log->updated_at}}</td>
            </tr>
            @endforeach
        </table>
    @endif
    </div>
</x-app-layout>
