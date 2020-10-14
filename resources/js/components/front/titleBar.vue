<template>
    <div>
        <section class="" data-primary-overlay="7" style="background-color: #38c773">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div class="navbar-brand ml-5">
<!--                            <a class="logo-default" :href="'/'"><img alt="" :src="'http://'+asset+'/assets/img/logos/'+title.logo" width="75" height="75"></a>-->
                            <a class="logo-default" :href="asset"><img alt="" :src="'http://'+asset+'/assets/img/logos/'+title.logo" width="75" height="75"></a>
                        </div>
                    </div>
                    <div class="col-10 text-white">
                        <h2 class="mb-4">
                            {{ title.name }}<br>
                            {{ title.bn }}
                        </h2>
                    </div>
                </div> <!-- END row-->
            </div> <!-- END container-->
        </section>
    </div>
</template>

<script>
export default {
    data() {
        return {
            title : [],
            asset : location.host,
        }
    },
    created() {
        this.axios
            .get('http://'+location.host+'/api/title-bar')
            //.get('http://localhost/wpschool/public/api/title-bar')
            .then(response => {
                this.title = response.data;
                console.log(response.data)
            });
    }
}
</script>
