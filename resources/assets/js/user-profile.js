var ctx = document.getElementById("userContributionsChart").getContext("2d");
var data = {
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [
        {
            label: "monthly Contribution",
            fill: true,
            borderColor: "#2980b9",
            borderJoinStyle: 'miter',
            pointBorderColor: "#e74c3c",
            pointBackgroundColor: "#e74c3c",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "#e74c3c",
            pointHoverBorderColor: "#e74c3c",
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
            data: [650, 1000, 2000, 400, 0, 2000, 1200],
        }
    ]
};
var userContributionsChart = new Chart(ctx, {
    type: 'line',
    data: data
});
//vue app for the user profile page
var viewmodel = new Vue({
    el: '#vue-body',
    data: {
        user: user,
        showForm: false,
        url: '',
        pageLoaded: false,
        formErrors: {},
        loading: false
    },
    computed: {}
    ,

    methods: {
        updateUser: function (e) {
            e.preventDefault();
            this.loading = true
            this.$http.post(this.url, this.user).then(function (response) {
                console.log(response.data);
                setTimeout(function () {
                    $('#userUpdateModal').modal('hide')
                }, 1200);
                notie.alert(1, 'User profile updated successfully', 4);
                this.loading = false
                this.formErrors = {};
            }, function (response) {
                notie.alert(3, 'please correct the errors in the form.', 3);
                var errors = response.data;
                this.formErrors = errors;
                this.loading = false
            });
        }
        ,
    }
    ,
    transitions: {
        'bounce': {
            enterClass: 'bounceInLeft',
            leaveClass: 'bounceOutRight'
        }
        ,
        'fade': {
            enterClass: 'fadeIn',
            leaveClass: 'fadeOutUp'
        },
        'zoom': {
            enterClass: 'slideInUp',
            leaveClass: 'zoomOut'
        }
    }
    ,
    ready: function () {
        this.pageLoaded = true
    }
});
