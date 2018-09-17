@extends('master.app')
@section('title','Ongoing Projects')
@section('content')          
        <div class="my-3 my-md-5">
            <div class="container">
              <div class="page-header">
                <h1 class="page-title">My Projects</h1> 
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
                                <th><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Create Project</button></th>
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
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="" method="POST">
                  <div class="form-group">
                    <input type="text" class="form-control" id="recipient-name" placeholder="Enter title...">
                  </div>
                  <div class="form-group">
                    <select name="" id="" class="form-control">
                      <option value="">Choose a category</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Start From</label>
                    <input type="date" class="form-control" id="recipient-name">
                  </div>
                  <div class="form-group">
                      <label for="recipient-name" class="col-form-label">End date</label>
                      <input type="date" class="form-control" id="recipient-name">
                    </div>
                  <div class="form-group">
                    <textarea class="form-control" id="message-text" placeholder="Project description"></textarea>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success">Save</button>
              </div>
            </div>
          </div>
        </div>
    @endsection