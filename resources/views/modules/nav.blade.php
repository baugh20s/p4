<nav>
    <ul>
        <li><a href='/search'>Search</a></li>
        <li><a href='/contacts/create'>Add New</a></li>
        <li><a href='/contacts'>Preview Contacts</a></li>
        <li><a href='/contactus'>Contact Us</a></li>
        <li><a href='/about'>About</a></li>

        {{--

        Could not get this to work; added the IDEAutoCompleteHelp php file, but it still passed what I intended as the label value to the query string

        @foreach(config('app.nav') as $link => $label)
            <li>
                @if(Request::is(substr($link,1)))
                    {{ $label }}
                @else
                    <a href='{{ $label }}'>{{ $label }}</a>
                @endif
            </li>
        @endforeach

        --}}
    </ul>
</nav>