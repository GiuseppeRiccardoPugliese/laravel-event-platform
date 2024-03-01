@extends('layouts.app')
@section('content')
    @auth
        <h1 class="text-center">Your events: [{{ count(Auth::user()->events) }}]</h1>

        {{-- CREATE --}}
        <a href="{{ route('event.create') }}">CREATE</a>

        <ul>
            @foreach ($events as $event)
                @if ($user == $event->user->id)
                    <li>
                        {{-- SHOW --}}
                        <a href="{{ route('event.show', $event->id) }}">
                            <h2>{{ $event->title }}</h2>
                        </a>
                        <form action="{{ route('event.delete', $event->id) }}" method="POST">

                            @csrf
                            @method('DELETE')

                            <input type="submit" value="DELETE" id="delete" name="delete">
                        </form>
                    </li>
                    <a href="{{ route('event.edit', $event->id) }}"><button>EDIT</button></a>
                @endif
            @endforeach

        </ul>
    @endauth
@endsection


<script >

    //Importo AXIOS
    import axios from 'axios';

    export default {
      name: 'ApiContent',

      data() {
        return {
          events: [], //Array per le gli eventi
          users:[],//Array per le gli utenti
        }
      },
      methods: {
        getEvents() {
          axios.get('http://localhost:8000/api/v1/events/index')
            .then(res => {

              const data = res.data;
              console.log('log di data', res);


              this.events = data.events;
              console.log('2nd log', this.events);

              this.getUsers();

            })
            .catch(err => {
              console.log(err);
            })
        },
        getUsers() {
          axios.get('http://localhost:8000/api/v1/users/index')
            .then(res => {

              const data = res.data;

              this.users = data.users;

            })
            .catch(err => {
              console.log(err);
            })
        },

      },
      mounted() {
        this.getEvents();
        console.log(this.getEvents());
      }
    }

    </script>

    <template>
      <h1>Events: </h1>

      <div>
        <ul>
            <h2 v-for="user in users" :key="user.id">
                <p>User: {{user.name}}</p>
            </h2>
          <li v-for="event in events" :key="event.id">
            <h2> Titolo evento: {{ event.title }}</h2>
            <p>Descrizione evento: {{ event.description }}</p>

          </li>
        </ul>
      </div>
    </template>
