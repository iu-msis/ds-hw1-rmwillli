var commentApp = new Vue({
  el: '#commentList',
  data: {
    comment: [],
    commentForm: {}
  },
  methods: {
    handleCommentForm(e) {

      const s = JSON.stringify(this.commentForm);

      console.log(e);

        fetch('api/comment.php', {
          method: "POST",
          headers: {
            "Content-Type": "application/json; charset=utf-8"
        },
          body: s
        })
        .then( response => response.json() )
        .then( json => {this.comment.push(json)})
        .catch( err => {
          console.error('WORK POST ERROR:');
          console.error(err);
        })
      this.comment.push(JSON.parse(s));

      // Reset workForm
      this.commentForm = this.getEmptyWorkForm();
    },
    getEmptyWorkForm() {
      return {comment: ""}
    }
  },
  created () {
    this.commentForm = this.getEmptyWorkForm();

    //fetch('api/comment.php')
    //.then( response => response.json() )
  //  .then( json => {commentApp.comment = json} )
  //  .catch( err => {
    //  console.log('TEAM LIST ERROR:');
    //  console.log(err);
  //  })
  }
})
