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
                                    All Categories
                                </div>
                                <div class="col-md-6">
                                    <a href="{{route('admin.category.add')}}" class="btn btn-success float-end">Add Category</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @php
                            $i = ($categories->currentPage()-1) * $categories->perPage();    
                            @endphp

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>slug</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->slug}}</td>
                                        <td>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$categories->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>