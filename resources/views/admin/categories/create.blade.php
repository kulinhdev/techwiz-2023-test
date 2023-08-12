<x-admin-layout>
    <x-slot name="title">
        Create Category
    </x-slot>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Create New</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Create New Category</h4>
                            <form action={{ route("categories.store") }} method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-4">
                                    <label for="name" class="col-form-label col-lg-2">Name</label>
                                    <div class="col-lg-10">
                                        <input id="textInput" value="{{ old('name') }}" name="name" type="text"
                                            class="form-control" placeholder="Enter name...">
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="slug" class="col-form-label col-lg-2">Url</label>
                                    <div class="col-lg-10">
                                        <input id="slugOutput" value="{{ old('slug') }}" name="slug" type="text"
                                            placeholder="Auto generate slug..." class="form-control">
                                        <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-form-label col-lg-2">Image</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" name="imageFile" type="file" accept="image/*"
                                            id="formFile">
                                        <x-input-error :messages="$errors->get('imageFile')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-primary">Create New</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>

</x-admin-layout>
