<template>
    <div class="project-container position-relative row mt-5 mb-5">
        <div class="col-12 row text-center justify-content-center">
            <div class="col-5 text-right"><p @click="getArchitect(2)">Дизайн</p></div>
            <div class="col"><p>/</p></div>
            <div class="col-5 text-left "><p @click="getArchitect(1)">Архитектура</p></div>
        </div>
        <div v-if="errored" class="alert col-12 text-center alert-danger" role="alert">
            <strong>Данные не загрузились, попробуйте позже :(</strong>
        </div>
        <div v-if="loading" class="h-25 m-auto">
            <div class="lds-ripple"><div></div><div></div></div>
        </div>
        <div v-else v-for="project in projects" :key="project.id" class="col-sm-12 col-md-6 col-lg-4 mt-5" :style="{height: '30%', fontWeight: 'bolder', color: 'black'}">
            <div class="card text-left" style="background-color: transparent; border: none">
                <!--                <div class="img-fluid" style="width: 100%;height: 250px;background-image: url('{{is_file(public_path("storage/images_project/" .$project->id.'/'.$project->preview))? asset("storage/images_project/" . $project->id ."/".$project->preview) : asset("storage/images_project/".$project->preview)}}'); background-size: cover;background-repeat: no-repeat; background-position: center"></div>*/-->
                <div
                    class="img-fluid"
                    :style="{
                    width: '100%',
                    height: '250px',
                    backgroundImage: `url(${project.preview === 'default.jpg'? url+'storage/images_project/'+project.preview : url+'storage/images_project/'+project.id+'/'+project.preview})`,
                    backgroundSize: 'cover',
                    backgroundRepeat: 'no-repeat',
                    backgroundPosition: 'center'
            }"></div>
                <div class="card-body float-left p-0 mt-4">
                    <h3 class="card-title font-weight-bolder">{{ project.title }}</h3>
                    <span class="d-block small">Общая стоимость: {{ project.price }}</span>
                    <span class="d-block small">Общая площадь: {{ project.square }}</span>
                    <a class="btn text-white p-2 mt-3" style="background-color: black"
                       :href="'/'+project.category.slug + '/'+project.slug">Смотреть</a>
                    <!--               href="{{ route('home.one', [$project->category->slug, $project->slug]) }}">Смотреть</a>-->
                </div>
            </div>
        </div>
        <nav class="my-5 mx-auto top col-12 position-sticky">
            <ul class="pagination justify-content-center">
                <li :class="{disabled: !pagination.prev_page_url }"
                    @click.prevent="getProjects(pagination.prev_page_url)"
                    class="page-item">
                    <a class="page-link" href="#">Предыдущая</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link" href="#">
                        Страница {{ pagination.current_page }} из {{ pagination.last_page }}
                    </a>
                </li>
                <li :class="{disabled: !pagination.next_page_url }"
                    @click.prevent="(pagination.next_page_url != null) ? getProjects(pagination.next_page_url) : ''"
                    class="page-item">
                    <a class="page-link" disabled="true" href="#">Следующая</a>
                </li>
            </ul>
        </nav>

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
            url: ''
        }
    },
    mounted() {
        this.getProjects();
    },
    methods:{
        getProjects(page_url) {
            page_url = page_url || '/api/projects';
            axios.get(page_url)
                .then(response => {
                    this.projects = response.data.data;
                    this.makePagination(response.data);
                })
                .catch(error => {
                    console.log(error);
                    this.errored = true;
                })
                .finally(() => this.loading = false);
        },
        makePagination(response) {
            let pagination = {
                current_page: response.current_page,
                last_page: response.last_page,
                prev_page_url: response.prev_page_url,
                next_page_url: response.next_page_url
            };
            this.pagination = pagination;
            console.log(this.pagination);

        },
        getArchitect(some) {
            axios.get(`/api/projects/filterProject/${some}`)
                .then(response => {
                    this.projects = response.data.data;
                    this.makePagination(response.data);
                })
                .catch(error => {
                    console.log(error);
                    this.errored = true;
                })
                .finally(() => this.loading = false);
        }
    }
}
</script>
<style scoped>
.project-container{
    font-size: 0.7rem;
}
.lds-ripple {
    display: inline-block;
    position: relative;
    width: 80px;
    height: 80px;
}
.lds-ripple div {
    position: absolute;
    border: 4px solid black;
    opacity: 1;
    border-radius: 50%;
    animation: lds-ripple 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
}
.lds-ripple div:nth-child(2) {
    animation-delay: -0.5s;
}
@keyframes lds-ripple {
    0% {
        top: 36px;
        left: 36px;
        width: 0;
        height: 0;
        opacity: 1;
    }
    100% {
        top: 0;
        left: 0;
        width: 72px;
        height: 72px;
        opacity: 0;
    }
}

</style>
