<template>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 text-left">
                <h5 class="text-primary">Skills</h5>
                <p class="text-info">See your Skills</p>
            </div>
            <div class="col-lg-6 text-right">
<!--                <a href="#" class="btn btn-sm btn-primary" title="Create New Profile or edit"><i class="far fa-plus-square"></i> </a>-->
                <router-link to='/createSkills' class="btn btn-sm btn-primary" title="Create New Skill">Create new skill</router-link>
            </div>
        </div>
        <hr class="bg-primary">
        <div class="table-responsive">
            <table class="table table-striped" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th class="text-dark">Name</th>
                    <th class="text-dark">Mobile</th>
                    <th class="text-dark">Email</th>
                    <th class="text-dark">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
<!--                        <ul class="list-inline">-->
<!--                            <li class="list-inline-item"><a href="" class="btn btn-sm btn-info" title="View"><i class="far fa-eye"></i></a> </li>-->
<!--                            <li class="list-inline-item"><a href="" class="btn btn-sm btn-warning" title="Edit"><i class="fas fa-user-edit"></i></a> </li>-->
<!--                            <li class="list-inline-item">-->
<!--                                <form class="" action="" method="post">-->
<!--                                    @csrf-->
<!--                                    @method('delete')-->
<!--                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you want to delete {{ $profiles->first_name }} ?')"><i class="fas fa-user-times"></i></button>-->
<!--                                </form>-->
<!--                            </li>-->
<!--                        </ul>-->
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data: function () {
        return {
            skills: []
        }
    },
    mounted() {
        const app = this;
        axios.get('/api/v1/skills')
            .then(function (resp) {
                app.skills = resp.data;
            })
            .catch(function (resp) {
                console.log(resp);
                alert("Could not load skills");
            });
    }
}
</script>
