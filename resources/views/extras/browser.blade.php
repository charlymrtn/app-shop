<form class="form-inline" action="{{route('query')}}" method="GET">
    <div class="input-group">
        <div class="form-group" id="bloodhound">
            <label for="query" class="sr-only">¿Qué buscas?</label>
            <input type="text" class="form-control typeahead" name="query" id="query" id="search" placeholder="¿Qué buscas?">
        </div>
        <button type="submit" class="btn btn-primary btn-just-icon">
            <i class="material-icons">search</i>
        </button>
    </div>
</form>
