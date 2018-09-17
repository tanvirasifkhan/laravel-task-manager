@extends('master.app')
@section('title','Completed Projects')
@section('content')          
        <div class="my-3 my-md-5">
            <div class="container">
              <div class="page-header">
                <h1 class="page-title">Completed Projects</h1> 
              </div>
              <div class="row row-cards row-deck">
                <div class="col-12">
                  <div class="card">
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                            <thead>
                              <tr>
                                <th>Project Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Design Works</td>
                                <td>Carlson Limited</td>
                                <td><p class="text-center text-light bg-success m-2">Done</p></td>
                                <td>87956621</td>
                                <td>15 Dec 2017</td>
                                <td><span class="status-icon bg-success"></span> Paid</td>
                                <td>
                                  <a href="" class="btn btn-success">Done</a>
                                  <a href="" class="btn btn-warning">Pending</a>
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
                        <a class="page-link" href="#" tabindex="-1">Prev</a>
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