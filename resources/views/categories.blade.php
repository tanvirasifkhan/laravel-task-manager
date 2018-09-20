@extends('master.app')
@section('title','Categories')
@section('content')          
        <div class="my-3 my-md-5">
            <div class="container">
              <div class="page-header">
                <h1 class="page-title">Categories</h1> 
                <div class="row gutters-xs ml-auto">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Search for...">
                    </div>
                    <span class="col-auto">
                        <button class="btn btn-secondary" type="button"><i class="fe fe-search"></i></button>
                    </span>
                </div>
              </div>
              <div class="row row-cards row-deck">
                <div class="col-12">
                  <div class="card">
                    <div class="table-responsive">
                      <table class="table card-table table~-vcenter text-nowrap">
                        <thead>
                          <tr>
                            <th>Category Title</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                            <th><a href="{{route('category.create')}}" class="btn btn-success">Create Category</a></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Design Works</td>
                            <td>15 Dec 2017</td>
                            <td>15 Dec 2017</td>
                            <td>
                              <a href="" class="btn btn-info">Edit</a>
                              <a href="" class="btn btn-danger">Remove</a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <ul class="pagination justify-content-end">
                      <li class="page-item page-prev disabled">
                        <a class="page-link" href="#" tabindex="-1">
                          Prev
                        </a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item active"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">4</a></li>
                      <li class="page-item"><a class="page-link" href="#">5</a></li>
                      <li class="page-item page-next">
                        <a class="page-link" href="#">
                          Next
                        </a>
                      </li>
                    </ul>
                </div>
              </div>              
            </div>            
          </div>
      </div>
    @endsection