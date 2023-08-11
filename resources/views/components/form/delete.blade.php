<form action="{{$action}}" class="d-inline" method="POST">
    @csrf
    @method("delete")
    <button class="btn btn-danger btn-sm"  type="submit">
        <i class="fas fa-trash">
        </i>
        Delete
    </button>
    
    </form>