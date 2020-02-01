<table class="author_table">
    <tr>
        <td>Created By:</td>
        <td>
            
            {{ $creator->user->firstname }}
            {{ $creator->user->middlename }}
            {{ $creator->user->lastname }}
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            {{ date_format($creator->created_at, 'M d, Y h:i:s A') }}
        </td>
    </tr>
    @if($editor !== null)
    <tr>
        <td>Last update by:</td>
        <td>
            {{ $editor->user->firstname }}
            {{ $editor->user->middlename }}
            {{ $editor->user->lastname }}
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            {{ date_format($editor->created_at, 'M d, Y h:i:s A') }}
        </td>
    </tr>
    @endif
</table>