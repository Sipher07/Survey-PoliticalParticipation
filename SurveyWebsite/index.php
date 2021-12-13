<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/css/foundation.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="./css/radio.css"> 
    <!-- <link rel="stylesheet" href="css/buttons.css"> -->
    

  
      
    <title>Survey Form</title>
</head>

<body>
 <div class="grid-container full fluid">
        <div class="head"></div> 
        
        <form action="process/insert.php">
            <h3>Analysis on the Level of Political Participation of the citizens from each Barangay in Muntinlupa City: A Survey</h3>
            
            <p class="desc"> Good day! 

 We are fourth-year college students from the Pamantasan ng Lungsod ng Muntinlupa, 
 Bachelor of Science in Computer Science program. As part of our requirements as
 graduating students, we are here to conduct an online survey for our thesis entitled, 
 Analysis on the Level of Political Participation of the citizens from each Barangay in 
 Muntinlupa City using K-Means Clustering Algorithm

 By participating in this survey, we are therefore granted permission to utilize the data we have 
 acquired. However,rest assured that all of the information gathered here will only be used for 
 thesis and research purposes only and that we solemnly abide by the Republic Act 
 10173 - Data Privacy Act of 2012.</P>
<hr>

 <div class="wrapper">
         <div class="input-data">
            <input type="text" placeholder="Full name (Optional)">
            <div class="underline"></div>
            <label></label>
         </div>
      </div>



 <!--<label>Full name (Optional)</label>
                    <input type="text" name="rname" id="rname" placeholder="Your Name"> -->
<br>
<label>Age</label>
  <select name="sample" id="age" required>
    <option value="1">18</option>
    <option value="2">19</option>
    <option value="3">20</option>
    <option value="1">21</option>
    <option value="2">22</option>
    <option value="3">23</option>
    <option value="1">24</option>
    <option value="2">25</option>
    <option value="3">26</option>
    <option value="1">27</option>
    <option value="2">28</option>
    <option value="3">29</option>
    <option value="1">30</option>
    <option value="2">31</option>
    <option value="3">32</option>
    <option value="1">33</option>
    <option value="2">34</option>
    <option value="3">35</option>
    <option value="1">36</option>
    <option value="2">37</option>
    <option value="3">38</option>
    <option value="1">39</option>
    <option value="2">40</option>
    <option value="3">41</option>

    <option value="1">18</option>
    <option value="2">19</option>
    <option value="3">20</option>
    <option value="1">21</option>
    <option value="2">22</option>
    <option value="3">23</option>
    <option value="1">24</option>
    <option value="2">25</option>
    <option value="3">26</option>
    <option value="1">27</option>
    <option value="2">28</option>
    <option value="3">29</option>
    <option value="1">30</option>
    <option value="2">31</option>
    <option value="3">32</option>
    <option value="1">33</option>
    <option value="2">34</option>
    <option value="3">35</option>
    <option value="1">36</option>
    <option value="2">37</option>
    <option value="3">38</option>
    <option value="1">39</option>
    <option value="2">40</option>
    <option value="3">41</option>

  </select>
  <input type="number" min=18 max=80/>



  <label>Gender</label>
  <form action="" required>
  <input type="radio" name="gender" value="male" checked> Male<br>
  <input type="radio" name="gender" value="female"> Female<br>
     
  

  <label>Barangay</label>
  <select name="sample" id="age" required>
    <option value="1">one</option>
    <option value="2">two</option>
    <option value="3">three</option>
  </select>
</label>

  <p style="color:black;text-align:center;"><b> Always = 5, Often = 4, Sometimes = 3, Rarely = 2, Never = 1 </p></b>
<!------------------------------------------------------------------------------------------------------------------------------------>
 
<div class="grid-x grid-padding-x">
                
            </div> 

            <br>

            <div class="table-scroll">
                <div class="grid-x grid-padding-x">
                    <div class="cell">
                        <table class="hover">
                            <thead>
                                <tr>
                                    <th width="75%"></th>
                                    <th width="5%">Never</th>
                                    <th width="5%">Rarely</th>
                                    <th width="5%">Sometimes</th>
                                    <th width="5%">Often</th>
                                    <th width="5%">Always</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                                <tr>
                                    <td>I work for a political party or candidates during elections</td>
                                    <td><input type="radio" name="question1" id="question1" value="SD" required="required"></td>
                                    <td><input type="radio" name="question1" id="question1" value="D"></td>
                                    <td><input type="radio" name="question1" id="question1" value="N"></td>
                                    <td><input type="radio" name="question1" id="question1" value="A"></td>
                                    <td><input type="radio" name="question1" id="question1" value="SA"></td>
                                </tr>

                                <tr>
                                    <td>I attend political meetings</td>
                                    <td><input type="radio" name="question2" id="question2" value="SD" required="required"></td>
                                    <td><input type="radio" name="question2" id="question2" value="D"></td>
                                    <td><input type="radio" name="question2" id="question2" value="N"></td>
                                    <td><input type="radio" name="question2" id="question2" value="A"></td>
                                    <td><input type="radio" name="question2" id="question2" value="SA"></td>
                                </tr>

                                <tr>
                                    <td>I am/was a member of a political party</td>
                                    <td><input type="radio" name="question3" id="question3" value="SD" required="required"></td>
                                    <td><input type="radio" name="question3" id="question3" value="D"></td>
                                    <td><input type="radio" name="question3" id="question3" value="N"></td>
                                    <td><input type="radio" name="question3" id="question3" value="A"></td>
                                    <td><input type="radio" name="question3" id="question3" value="SA"></td>
                                </tr>

                                <tr>
                                    <td>I attend political rallies</td>
                                    <td><input type="radio" name="question4" id="question4" value="SD" required="required"></td>
                                    <td><input type="radio" name="question4" id="question4" value="D"></td>
                                    <td><input type="radio" name="question4" id="question4" value="N"></td>
                                    <td><input type="radio" name="question4" id="question4" value="A"></td>
                                    <td><input type="radio" name="question4" id="question4" value="SA"></td>
                                </tr>

                                <tr>
                                    <td>I discuss about Politics with my friends, relatives and Colleagues</td>
                                    <td><input type="radio" name="question5" id="question5" value="SD" required="required"></td>
                                    <td><input type="radio" name="question5" id="question5" value="D"></td>
                                    <td><input type="radio" name="question5" id="question5" value="N"></td>
                                    <td><input type="radio" name="question5" id="question5" value="A"></td>
                                    <td><input type="radio" name="question5" id="question5" value="SA"></td>
                                </tr>

                                <tr>
                                    <td>I participate actively to solve the community problems</td>
                                    <td><input type="radio" name="question6" id="question6" value="SD" required="required"></td>
                                    <td><input type="radio" name="question6" id="question6" value="D"></td>
                                    <td><input type="radio" name="question6" id="question6" value="N"></td>
                                    <td><input type="radio" name="question6" id="question6" value="A"></td>
                                    <td><input type="radio" name="question6" id="question6" value="SA"></td>
                                </tr>

                                <tr>
                                    <td>I file petitions against the government</td>
                                    <td><input type="radio" name="question7" id="question7" value="SD" required="required"></td>
                                    <td><input type="radio" name="question7" id="question7" value="D"></td>
                                    <td><input type="radio" name="question7" id="question7" value="N"></td>
                                    <td><input type="radio" name="question7" id="question7" value="A"></td>
                                    <td><input type="radio" name="question7" id="question7" value="SA"></td>
                                </tr>

                                <tr>
                                    <td>I refuse to pay government rent and taxes to influence government decisions</td>
                                    <td><input type="radio" name="question8" id="question8" value="SD" required="required"></td>
                                    <td><input type="radio" name="question8" id="question8" value="D"></td>
                                    <td><input type="radio" name="question8" id="question8" value="N"></td>
                                    <td><input type="radio" name="question8" id="question8" value="A"></td>
                                    <td><input type="radio" name="question8" id="question8" value="SA"></td>
                                </tr>

                                <tr>
                                    <td>I take part in blockades to influence government</td>
                                    <td><input type="radio" name="question9" id="question9" value="SD" required="required"></td>
                                    <td><input type="radio" name="question9" id="question9" value="D"></td>
                                    <td><input type="radio" name="question9" id="question9" value="N"></td>
                                    <td><input type="radio" name="question9" id="question9" value="A"></td>
                                    <td><input type="radio" name="question9" id="question9" value="SA"></td>
                                </tr>

                                <tr>
                                    <td>I take part in demonstration to influence government</td>
                                    <td><input type="radio" name="question10" id="question10" value="SD" required="required"></td>
                                    <td><input type="radio" name="question10" id="question10" value="D"></td>
                                    <td><input type="radio" name="question10" id="question10" value="N"></td>
                                    <td><input type="radio" name="question10" id="question10" value="A"></td>
                                    <td><input type="radio" name="question10" id="question10" value="SA"></td>
                                </tr>
                           
                                <tr>
                                    <td>I take part in boycotts to influence government</td>
                                    <td><input type="radio" name="question11" id="question11" value="SD" required="required"></td>
                                    <td><input type="radio" name="question11" id="question11" value="D"></td>
                                    <td><input type="radio" name="question11" id="question11" value="N"></td>
                                    <td><input type="radio" name="question11" id="question11" value="A"></td>
                                    <td><input type="radio" name="question11" id="question11" value="SA"></td>
                                </tr>

                                <tr>
                                    <td>I use electronic media (TV/Radio) to know about politics</td>
                                    <td><input type="radio" name="question12" id="question12" value="SD" required="required"></td>
                                    <td><input type="radio" name="question12" id="question12" value="D"></td>
                                    <td><input type="radio" name="question12" id="question12" value="N"></td>
                                    <td><input type="radio" name="question12" id="question12" value="A"></td>
                                    <td><input type="radio" name="question12" id="question12" value="SA"></td>
                                </tr>

                                <tr>
                                    <td>I search on internet about politics.</td>
                                    <td><input type="radio" name="question13" id="question13" value="SD" required="required"></td>
                                    <td><input type="radio" name="question13" id="question13" value="D"></td>
                                    <td><input type="radio" name="question13" id="question13" value="N"></td>
                                    <td><input type="radio" name="question13" id="question13" value="A"></td>
                                    <td><input type="radio" name="question13" id="question13" value="SA"></td>
                                </tr>

                                <tr>
                                    <td>I read about politics in Print Media (Newspapers/Magazines etc.)</td>
                                    <td><input type="radio" name="question14" id="question14" value="SD" required="required"></td>
                                    <td><input type="radio" name="question14" id="question14" value="D"></td>
                                    <td><input type="radio" name="question14" id="question14" value="N"></td>
                                    <td><input type="radio" name="question14" id="question14" value="A"></td>
                                    <td><input type="radio" name="question14" id="question14" value="SA"></td>
                                </tr>

                                <tr>
                                    <td>I try to influence my friends, relatives and colleagues on formation of political opinion</td>
                                    <td><input type="radio" name="question15" id="question15" value="SD" required="required"></td>
                                    <td><input type="radio" name="question15" id="question15" value="D"></td>
                                    <td><input type="radio" name="question15" id="question15" value="N"></td>
                                    <td><input type="radio" name="question15" id="question15" value="A"></td>
                                    <td><input type="radio" name="question15" id="question15" value="SA"></td>
                                </tr>

                                <tr>
                                    <td>I try to convince my friends, relatives and colleagues to vote</td>
                                    <td><input type="radio" name="question16" id="question16" value="SD" required="required"></td>
                                    <td><input type="radio" name="question16" id="question16" value="D"></td>
                                    <td><input type="radio" name="question16" id="question16" value="N"></td>
                                    <td><input type="radio" name="question16" id="question16" value="A"></td>
                                    <td><input type="radio" name="question16" id="question16" value="SA"></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <br><br><br>

            <div class="grid-x grid-padding-x">
                <div class="cell">
                    <h5>Comments and Recommendation:</h5>
                    <textarea name="comments" id="comments" rows="8" placeholder="(Optional)"></textarea>
                </div>
            </div>

            <hr class="hrb">

            <div class="text-center">
        <button class="btn btn-primary btn-block my-4" type="submit" name="registrarfeedbackform">SUBMIT</button>
    </div>
            </div>
        </form>
    </div>
    
    <br>

    <script> document.querySelectorAll('.custom-select').forEach(setupSelector);

function setupSelector(selector) {
  selector.addEventListener('change', e => {
    console.log('changed', e.target.value)
  })

  selector.addEventListener('mousedown', e => {
    if(window.innerWidth >= 420) {// override look for non mobile
      e.preventDefault();

      const select = selector.children[0];
      const dropDown = document.createElement('ul');
      dropDown.className = "selector-options";

      [...select.children].forEach(option => {
        const dropDownOption = document.createElement('li');
        dropDownOption.textContent = option.textContent;

        dropDownOption.addEventListener('mousedown', (e) => {
          e.stopPropagation();
          select.value = option.value;
          selector.value = option.value;
          select.dispatchEvent(new Event('change'));
          selector.dispatchEvent(new Event('change'));
          dropDown.remove();
        });

        dropDown.appendChild(dropDownOption);   
      });

      selector.appendChild(dropDown);

      // handle click out
      document.addEventListener('click', (e) => {
        if(!selector.contains(e.target)) {
          dropDown.remove();
        }
      });
    }
  });
}
</script>

    <script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/js/foundation.min.js" crossorigin="anonymous"></script>
</body>
</html>