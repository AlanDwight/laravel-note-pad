<x-app-layout>
    <!-- Order your soul. Reduce your wants. - Augustine -->
    <div class="note-container py-12">
        <a href={{ route('note.create')}} class="new-note-btn">
            New Note
        </a>
        <div class="notes">
            {{--  blade directive --}}
            @foreach ($notes as $note)
                <div class="note">
                    <div class="note-body">
                        {{Str::words($note->note, 15)}}
                    </div>
                    <div class="note-buttons">
                        <a href= {{ route('note.show', $note) }} class="note-edit-button">View</a>
                        {{-- passing primary key --}}
                        <a href={{ route ('note.edit', $note) }} class="note-edit-button">Edit</a>
                        <form action={{route('note.destroy', $note)}} method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="note-delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="p-6">
            {{ $notes -> links() }}
        </div>
    </div>
</x-app-layout>
