var personalInfo = new Vue({
  el: '#personalInfo',
  data: {
    result:
    {
      gender: "",
      "name": {
        "title": "",
        "first": "",
        "last": ""
      },
      "location": {
        "street": "",
        "city": "",
        "state": "",
        "postcode": "",
        "coordinates": {
          "latitude": "",
          "longitude": ""
        },
        "timezone": {
          "offset": "",
          "description": ""
        }
      },
      "email": "",
      "login": {
        "uuid": "",
        "username": "",
        "password": "",
        "salt": "",
        "md5": "",
        "sha1": "",
        "sha256": ""
      },
      "dob": {
        "date": "",
        "age": 0
      },
      "registered": {
        "date": "",
        "age": 0
      },
      "phone": "",
      "cell": "",
      "id": {
        "name": "",
        "value": ""
      },
      "picture": {
        "large": "",
        "medium": "",
        "thumbnail": ""
      },
      "nat": "NO"
    }
  ,
  "info": {
    "seed": "2da87e9305069f1d",
    "results": 1,
    "page": 1,
    "version": "1.2"
  }

  },
  computed: {

  },
  methods: {
    pretty_date: function (d) {
      return moment(d).format('l')
    },

    fetchProject () {
  fetch('https://randomuser.me/api/')
  .then( response => response.json() )
  .then( json => {personalInfo.result = json.results[0]} )
  .catch( err => {
    console.log('PROJECT FETCH ERROR:');
    console.log(err);
  })
}
    //userapp.somethingelse = json.results[0]
  },
  created () {
      this.fetchProject();
    }
})
