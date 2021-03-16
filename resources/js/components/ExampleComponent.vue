<template>
    <div   class="row mt-5 mb-5" style="font-size: 0.7em;">
        <div v-for="project in projects" :key="project.id" class="col-sm-12 col-md-6 col-lg-4 mt-5" :style="{height: '30%', fontWeight: 'bolder', color: 'black'}">
            <div class="card text-left" style="background-color: transparent; border: none">
                <div class="img-fluid" style="width: 100%;height: 250px;background-image: url('{{is_file(public_path("storage/images_project/" .$project->id.'/'.$project->preview))? asset("storage/images_project/" . $project->id ."/".$project->preview) : asset("storage/images_project/".$project->preview)}}'); background-size: cover;background-repeat: no-repeat; background-position: center"></div>*/
            <div
                class="img-fluid"
                :style="{
                    width: '100%',
                    height: '250px',
                    backgroundImage: `url(${project.preview === 'default.jpg'? 'public/image_project/'+project.preview :'public/image_project/'+project.id+project.preview})`,
                    backgroundSize: 'cover',
                    backgroundRepeat: 'no-repeat',
                    backgroundPosition: 'center'
            }"></div>
            <div class="card-body float-left p-0 mt-4">
                <h3 class="card-title font-weight-bolder">{{ project.title }}</h3>
                <span class="d-block small">Общая стоимость: {{ project.price }}</span>
                <span class="d-block small">Общая площадь: {{ project.square }}</span>
                <a class="btn text-white p-2 mt-3" style="background-color: black"
                   href="#">Смотреть</a>
                <!--               href="{{ route('home.one', [$project->category->slug, $project->slug]) }}">Смотреть</a>-->
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return{
            projects:[],
            project:{
                id:'',
                title: '',
                price: 0,
                square: '',
                slug: '',
                content: '',
                preview: '',
                category_id: '',
                is_published: 0,
                carousel: 0
            },
            image: [],
            category: [],
            pagination: {},
            loading: true,
            errored: false,
        }
    },
    mounted() {
        this.getProjects();
    },
    methods:{
        getProjects() {
            axios.get('/api/projects')
                .then(response => this.projects = response.data.data)
                .catch(error=> {
                    console.log(error);
                    this.errored = true;
                })
                .finally(()=>this.loading = false);

        }
    }
}
</script>
