<form action="" method="post" id="commentform" class="comment-form">
                                  <!-- <p class="comment-form-rating">
                                    <label for="rating">Your Rating</label>
                                    <p class="stars"><span><a class="star-1" href="#">1</a><a class="star-2" href="#">2</a><a class="star-3" href="#">3</a><a class="star-4" href="#">4</a><a class="star-5" href="#">5</a></span></p><select name="rating" id="rating" style="display: none;">
                                      <option value="">Rate ...</option>
                                      <option value="5">Perfect</option>
                                      <option value="4">Good</option>
                                      <option value="3">Average</option>
                                      <option value="2">Not that bad</option>
                                      <option value="1">Very Poor</option>
                                    </select>
                                  </p> -->
                                  <div id="starttwo" class="block clearfix">
                                      <div  class="star_score"></div>
                                      <p style="float:left;">您的评分：<span class="fenshu"></span> 分</p>
                                  </div>
                                  <script type="text/javascript" src="js/startScore.js"></script>
                                  <script>
                                   scoreFun($("#startone"))
                                   scoreFun($("#starttwo"),{
                                         fen_d:22,//每一个a的宽度
                                         ScoreGrade:5//a的个数 10或者
                                       })
                                  </script>
                                  <p class="title">分数展示</p>
                                  <ul class="show_number clearfix">
                                     <li>
                                      <div class="atar_Show">
                                        <p tip="2.5"></p>
                                      </div>
                                      <span></span>
                                     </li>
                                     <li>
                                      <div class="atar_Show">
                                        <p tip="3.5"></p>
                                      </div>
                                      <span></span>
                                     </li>
                                     <li>
                                      <div class="atar_Show">
                                        <p tip="5"></p>
                                      </div>
                                      <span></span>
                                     </li>
                                  </ul>
                                  <script>
                                  //显示分数
                                    $(".show_number li p").each(function(index, element) {
                                      var num=$(this).attr("tip");
                                      var www=num*2*16;//
                                      $(this).css("width",www);
                                      $(this).parent(".atar_Show").siblings("span").text(num+"分");
                                  });
                                  </script>
                                  <p class="comment-form-comment">
                                    <label for="comment">Your Review</label>
                                    <textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
                                  </p>
                                  
                                  <p class="form-submit">
                                    <input name="submit" type="submit" id="submit" class="submit" value="Submit">
                                  </p>
                                </form>