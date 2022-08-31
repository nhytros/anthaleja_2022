    <table class="table table-condensed">
        @foreach ($transitions as $transition)
            @php $date=new app\Helpers\ATHDateTime($transition->created_at); @endphp
            <tr>
                <td class="text-start">{{ $date->format('Y, d/m') }}
                    <small>({{ $transition->created_at->format('d/m/Y') }})</small>
                </td>
                <td>{{ $transition->description }}</td>
                <td class="text-end">
                    @if ($transition->income)
                        <span class="text-success">+{{ toAthel($transition->income) }}</span>
                    @else
                        <span class="text-dark">-{{ toAthel($transition->outcome) }}</span>
                    @endif
                </td>
            </tr>
            <tr>

            </tr>
        @endforeach
    </table>
