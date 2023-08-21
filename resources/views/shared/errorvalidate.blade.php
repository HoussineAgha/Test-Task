@if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            </ul>
            @endforeach
        </div>

        @else

        @endif
