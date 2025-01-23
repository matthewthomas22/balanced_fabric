$(document).ready(function () {

    const base_url = "http://192.168.100.163/balanced_fabric/C_Fab_Recap/";

    const app = Vue.createApp({
        data(){
            return{
                searchedPO: '',
                searchFabRecap: false,
                selectedZroh: ''
            }
        }, 
        mounted(){
            this.getQTYforCut();
        },
        methods:{
            getQTYforCut(){
                $.ajax({
                    type: "post",
                    url: base_url + "getQTYforCut",
                    success: function (response) {
                        console.log(JSON.parse(response));
                    }
                });
            }
        }
    })

    // Mount the app to the element with the id 'review_mill'
	const vueApp = app.mount("#mount_fab_recap");
});