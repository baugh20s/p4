<nav class='navMenu'>
        <p class='nav'><a href='/search'>Search</a></p>
        <p class='nav'><a href='/contacts/create'>Add New</a></p>
        <p class='nav'><a href='/contacts'>Preview Contacts</a></p>
        <p class='nav'><a href='/hobbies'>Hobbies</a></p>
        <p class='nav'><a href='/contactus'>Contact Us</a></p>
        <p class='nav'><a href='/about'>About</a></p>

        {{--

        Could not get this to work; added the IDEAutoCompleteHelp php file, but it still passed what I intended as the label value to the query string

        <ul>
        @foreach(config('app.nav') as $link => $label)
            <li>
                @if(Request::is(substr($link,1)))
                    {{ $label }}
                @else
                    <a href='{{ $label }}'>{{ $label }}</a>
                @endif
            </li>
        @endforeach
        </ul>
        --}}
</nav>