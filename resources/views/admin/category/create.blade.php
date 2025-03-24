<x-app-layout>
    <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between">
                <h4>Create Category</h4>
                <a href="{{route('admin.category.index')}}" class="btn btn-primary">Go back</a>
              </div>
              <div class="card-body">
                <form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-6" >
                            <label for="nep_title">Nepali Title</label>
                            <input type="nep_title" name="nep_title" id="nep_title" class="form-control" value="{{old('nep_title')}}">
                            @error('nep_title')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-6" >
                            <label for="eng_title">English Title</label>
                            <input type="eng_title" name="eng_title" id="eng_title" class="form-control" value="{{old('eng_title')}}">
                            @error('eng_title')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-6" >
                            <label for="meta_keywords">Meta Keywords</label>
                            <textarea name="meta_keywords" id="meta_keywords" class="form-control">
                                {{old('meta_keywords')}}
                            </textarea>
                            @error('meta_keywords')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-6" >
                            <label for="meta_description">Meta Description</label>
                            <textarea name="meta_description" id="meta_description" class="form-control">
                                {{old('meta_description')}}
                            </textarea>
                            @error('meta_description')
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
