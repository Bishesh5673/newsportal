<x-app-layout>
    <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between">
                <h4>Edit Article</h4>
                <a href="{{route('admin.article.index')}}" class="btn btn-primary">Go back</a>
              </div>
              <div class="card-body">
                <form action="{{route('admin.article.update',$articles->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="mb-3 col-6" >
                            <label for="categories">Select Categories</label>
                            <select name="categories[]" id="categories" class="form-control select2" multiple>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}"
                                        {{$articles->categories->contains($category->id)?'selected':''}}
                                        >{{$category->nep_title}}</option>
                                @endforeach
                            </select>
                            @error('categories')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-6" >
                            <label for="title">Title</label>
                            <input type="title" name="title" id="title" class="form-control" value="{{$articles->title}}">
                            @error('title')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-12" >
                            <label for="content">Content</label>
                            <textarea name="content" id="content" class="form-control summernote">
                                {{$articles->content}}
                            </textarea>
                            @error('content')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-12" >
                            <label for="meta_keywords">Meta Keywords</label>
                            <textarea name="meta_keywords" id="meta_keywords" class="form-control">
                                {{$articles->meta_keywords}}
                            </textarea>
                            @error('meta_keywords')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-12" >
                            <label for="meta_description">Meta Description</label>
                            <textarea name="meta_description" id="meta_description" class="form-control">
                                {{$articles->meta_description}}
                            </textarea>
                            @error('meta_description')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-6">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                            @error('image')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-12">
                            <button type="submit" class="btn btn-success">Save record</button>
                        </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    <div>
</x-app-layout>
