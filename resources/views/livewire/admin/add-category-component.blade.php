<style>
    nav svg{
        height: 20px;
    }
    nav .hidden{
        display: block;
    }
</style>

<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route("home.index")}}" rel="nofollow">Home</a>
                <span></span> All categories
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    Add category
                                </div>
                                <div>
                                    <a href="{{route('admin.categories')}}" class="btn btn-success float-end">All Categories</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route("admin.category.store")}}" method="POST">
                                @csrf
                                <div class="mb-3 mt-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter category name">
                                    @error('name') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <button type="submit" class="btn btn-success float-end">Submit</button>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </section>
</main>