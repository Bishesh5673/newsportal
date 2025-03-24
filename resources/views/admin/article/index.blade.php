<x-app-layout>
    <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between">
                <h4>
                    Article
                </h4>
                <a href="{{route('admin.article.create')}}" class="btn btn-primary">add new</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="table-1">
                    <thead>
                      <tr>
                        <th class="text-center">
                          #
                        </th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Views</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $i=>$article)
                        <tr>
                            <td>
                              {{$i+1}}
                            </td>
                            <td>
                                {{$article->title}}
                            </td>
                            <td>
                               <img src="{{asset($article->image)}}" width="120" alt=" {{$article->title}}">
                            </td>
                            <td>
                                {{$article->views}}
                            </td>
                            <td>
                                {{$article->status}}
                            </td>
                            <td>
                                <form action="{{route('admin.article.destroy', $article->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{route('admin.article.edit', $article->id) }}" class="btn btn-sm btn-primary">Edit</a>
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
