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
  <input type="number" min=18 max=80 id="age" required placeholder="Your Answer"/>



  <label>Gender</label>
  <form action="" required>
  <input type="radio" name="gender" value="male" checked> Male<br>
  <input type="radio" name="gender" value="female"> Female<br>
     
  

  <label>Barangay</label>
  <select name="sample" id="age" required>
    <option value="Alabang">Alabang</option>
    <option value="Ayala-Alabang">Ayala-Alabang</option>
    <option value="Bayanan">Bayanan</option>
    <option value="Buli">Buli</option>
    <option value="Cupang">Cupang</option>
    <option value="Poblacion">Poblacion</option>
    <option value="Putatan">Putatan</option>
    <option value="Sucat">Sucat</option>
    <option value="Tunasan">Tunasan</option>
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
                                    <th width="5%">1</th>
                                    <th width="5%">2</th>
                                    <th width="5%">3</th>
                                    <th width="5%">4</th>
                                    <th width="5%">5</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                                <tr>
                                    <td>I work for a political party or candidates during elections</td>
                                    <td><input type="radio" name="question1" id="question1" value="Never" required="required"></td>
                                    <td><input type="radio" name="question1" id="question1" value="Rarely"></td>
                                    <td><input type="radio" name="question1" id="question1" value="Sometimes"></td>
                                    <td><input type="radio" name="question1" id="question1" value="Often"></td>
                                    <td><input type="radio" name="question1" id="question1" value="Always"></td>
                                </tr>

                                <tr>
                                    <td>I attend political meetings</td>
                                    <td><input type="radio" name="question2" id="question2" value="Never" required="required"></td>
                                    <td><input type="radio" name="question2" id="question2" value="Rarely"></td>
                                    <td><input type="radio" name="question2" id="question2" value="Sometimes"></td>
                                    <td><input type="radio" name="question2" id="question2" value="Often"></td>
                                    <td><input type="radio" name="question2" id="question2" value="Always"></td>
                                </tr>

                                <tr>
                                    <td>I am/was a member of a political party</td>
                                    <td><input type="radio" name="question3" id="question3" value="Never" required="required"></td>
                                    <td><input type="radio" name="question3" id="question3" value="Rarely"></td>
                                    <td><input type="radio" name="question3" id="question3" value="Sometimes"></td>
                                    <td><input type="radio" name="question3" id="question3" value="Often"></td>
                                    <td><input type="radio" name="question3" id="question3" value="Always"></td>
                                </tr>

                                <tr>
                                    <td>I attend political rallies</td>
                                    <td><input type="radio" name="question4" id="question4" value="Never" required="required"></td>
                                    <td><input type="radio" name="question4" id="question4" value="Rarely"></td>
                                    <td><input type="radio" name="question4" id="question4" value="Sometimes"></td>
                                    <td><input type="radio" name="question4" id="question4" value="Often"></td>
                                    <td><input type="radio" name="question4" id="question4" value="Always"></td>
                                </tr>

                                <tr>
                                    <td>I discuss about Politics with my friends, relatives and Colleagues</td>
                                    <td><input type="radio" name="question5" id="question5" value="Never" required="required"></td>
                                    <td><input type="radio" name="question5" id="question5" value="Rarely"></td>
                                    <td><input type="radio" name="question5" id="question5" value="Sometimes"></td>
                                    <td><input type="radio" name="question5" id="question5" value="Often"></td>
                                    <td><input type="radio" name="question5" id="question5" value="Always"></td>
                                </tr>

                                <tr>
                                    <td>I participate actively to solve the community problems</td>
                                    <td><input type="radio" name="question6" id="question6" value="Never" required="required"></td>
                                    <td><input type="radio" name="question6" id="question6" value="Rarely"></td>
                                    <td><input type="radio" name="question6" id="question6" value="Sometimes"></td>
                                    <td><input type="radio" name="question6" id="question6" value="Often"></td>
                                    <td><input type="radio" name="question6" id="question6" value="Always"></td>
                                </tr>

                                <tr>
                                    <td>I file petitions against the government</td>
                                    <td><input type="radio" name="question7" id="question7" value="Never" required="required"></td>
                                    <td><input type="radio" name="question7" id="question7" value="Rarely"></td>
                                    <td><input type="radio" name="question7" id="question7" value="Sometimes"></td>
                                    <td><input type="radio" name="question7" id="question7" value="Often"></td>
                                    <td><input type="radio" name="question7" id="question7" value="Always"></td>
                                </tr>

                                <tr>
                                    <td>I refuse to pay government rent and taxes to influence government decisions</td>
                                    <td><input type="radio" name="question8" id="question8" value="Never" required="required"></td>
                                    <td><input type="radio" name="question8" id="question8" value="Rarely"></td>
                                    <td><input type="radio" name="question8" id="question8" value="Sometimes"></td>
                                    <td><input type="radio" name="question8" id="question8" value="Often"></td>
                                    <td><input type="radio" name="question8" id="question8" value="Always"></td>
                                </tr>

                                <tr>
                                    <td>I take part in blockades to influence government</td>
                                    <td><input type="radio" name="question9" id="question9" value="Never" required="required"></td>
                                    <td><input type="radio" name="question9" id="question9" value="Rarely"></td>
                                    <td><input type="radio" name="question9" id="question9" value="Sometimes"></td>
                                    <td><input type="radio" name="question9" id="question9" value="Often"></td>
                                    <td><input type="radio" name="question9" id="question9" value="Always"></td>
                                </tr>

                                <tr>
                                    <td>I take part in demonstration to influence government</td>
                                    <td><input type="radio" name="question10" id="question10" value="Never" required="required"></td>
                                    <td><input type="radio" name="question10" id="question10" value="Rarely"></td>
                                    <td><input type="radio" name="question10" id="question10" value="Sometimes"></td>
                                    <td><input type="radio" name="question10" id="question10" value="Often"></td>
                                    <td><input type="radio" name="question10" id="question10" value="Always"></td>
                                </tr>
                           
                                <tr>
                                    <td>I take part in boycotts to influence government</td>
                                    <td><input type="radio" name="question11" id="question11" value="Never" required="required"></td>
                                    <td><input type="radio" name="question11" id="question11" value="Rarely"></td>
                                    <td><input type="radio" name="question11" id="question11" value="Sometimes"></td>
                                    <td><input type="radio" name="question11" id="question11" value="Often"></td>
                                    <td><input type="radio" name="question11" id="question11" value="Always"></td>
                                </tr>

                                <tr>
                                    <td>I use electronic media (TV/Radio) to know about politics</td>
                                    <td><input type="radio" name="question12" id="question12" value="Never" required="required"></td>
                                    <td><input type="radio" name="question12" id="question12" value="Rarely"></td>
                                    <td><input type="radio" name="question12" id="question12" value="Sometimes"></td>
                                    <td><input type="radio" name="question12" id="question12" value="Often"></td>
                                    <td><input type="radio" name="question12" id="question12" value="Always"></td>
                                </tr>

                                <tr>
                                    <td>I search on internet about politics.</td>
                                    <td><input type="radio" name="question13" id="question13" value="Never" required="required"></td>
                                    <td><input type="radio" name="question13" id="question13" value="Rarely"></td>
                                    <td><input type="radio" name="question13" id="question13" value="Sometimes"></td>
                                    <td><input type="radio" name="question13" id="question13" value="Often"></td>
                                    <td><input type="radio" name="question13" id="question13" value="Always"></td>
                                </tr>

                                <tr>
                                    <td>I read about politics in Print Media (Newspapers/Magazines etc.)</td>
                                    <td><input type="radio" name="question14" id="question14" value="Never" required="required"></td>
                                    <td><input type="radio" name="question14" id="question14" value="Rarely"></td>
                                    <td><input type="radio" name="question14" id="question14" value="Sometimes"></td>
                                    <td><input type="radio" name="question14" id="question14" value="Often"></td>
                                    <td><input type="radio" name="question14" id="question14" value="Always"></td>
                                </tr>

                                <tr>
                                    <td>I try to influence my friends, relatives and colleagues on formation of political opinion</td>
                                    <td><input type="radio" name="question15" id="question15" value="Never" required="required"></td>
                                    <td><input type="radio" name="question15" id="question15" value="Rarely"></td>
                                    <td><input type="radio" name="question15" id="question15" value="Sometimes"></td>
                                    <td><input type="radio" name="question15" id="question15" value="Often"></td>
                                    <td><input type="radio" name="question15" id="question15" value="Always"></td>
                                </tr>

                                <tr>
                                    <td>I try to convince my friends, relatives and colleagues to vote</td>
                                    <td><input type="radio" name="question16" id="question16" value="Never" required="required"></td>
                                    <td><input type="radio" name="question16" id="question16" value="Rarely"></td>
                                    <td><input type="radio" name="question16" id="question16" value="Sometimes"></td>
                                    <td><input type="radio" name="question16" id="question16" value="Often"></td>
                                    <td><input type="radio" name="question16" id="question16" value="Always"></td>
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