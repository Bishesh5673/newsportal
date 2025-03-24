<x-app-layout>
    <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between">
                <h4>Category</h4>
                <a href="{{route('admin.category.create')}}" class="btn btn-primary">add new</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="table-1">
                    <thead>
                      <tr>
                        <th class="text-center">
                          #
                        </th>
                        <th>Nepali Title</th>
                        <th>English Title</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $i=>$category)
                        <tr>
                            <td>
                              {{$i+1}}
                            </td>
                            <td>
                                {{$category->nep_title}}
                            </td>
                            <td>
                                {{$category->eng_title}}
                            </td>
                            <td>
                                <form action="{{route('admin.category.destroy', $category->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{route('admin.category.edit', $category->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    <div>
</x-app-layout>
