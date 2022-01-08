<template>
    <div>
        <div class="header bg-green pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">Daily Log</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="#" class="text-green"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#" class="text-green">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Daily Log</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                            <a href="#" class="btn btn-sm btn-neutral text-green">New</a>
                            <a href="#" class="btn btn-sm btn-neutral text-green">Filters</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h3 class="mb-0">Today</h3>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                            <form class="mr-3" action="../AddEntry?id=@creds[0].UserID" method="post">
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="title">Entry Title</label>
                                                <input type="text" class="form-control" placeholder="Entry Title" name="title" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="mood">Mood</label>
                                                <select class="form-control" name="mood">
                                                    <option selected>Select a mood</option>
                                                    <option value="great">Great</option>
                                                    <option value="good">Good</option>
                                                    <option value="okay">Okay</option>
                                                    <option value="bad">Bad</option>
                                                    <option value="terrible">Terrible</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="description">Short Description</label>
                                                <input class="form-control" placeholder="Short Description" type="text" name="description" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pl-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="details">Details</label>
                                        <textarea rows="4" class="form-control" placeholder="Enter the details for your entry..." name="details"></textarea>
                                    </div>
                                    <div class="text-center">
                                        <input class="btn bg-green text-white mt-2 mb-4" type="submit" value="Submit">
                                    </div>
                                </div>
                            </form>
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name">Entry</th>
                                        <th scope="col" class="sort" data-sort="budget">Date</th>
                                        <th scope="col" class="sort" data-sort="status">Mood</th>
                                        <th scope="col" class="sort" data-sort="completion">Description</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm">Title</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td>
                                            Date
                                        </td>
                                        <td>
                                            <span class="badge badge-dot mr-4">
                                                <i class="bg-green"></i>
                                                <span class="status">Mood</span>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                Description
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="#">View</a>
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer py-4">
                            <nav aria-label="...">
                                <ul class="pagination justify-content-end mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#!" tabindex="-1">
                                            <i class="fas fa-angle-left"></i>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link bg-green border-0" href="#">1</a>
                                    </li>
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#!">
                                            <i class="fas fa-angle-right"></i>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    
}
</script>
