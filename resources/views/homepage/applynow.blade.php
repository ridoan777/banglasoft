<x-master>
<div id="applyWrapper" class="p-4">
   <h1 class="text-center text-blue-800">Doctors, Let's Join!</h1>
   <x-partials.alert :message="session('success')"/>
   <div class="my-4">

      <form action="{{ route('doctorCreate') }}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="w-full flex flex-col gap-4 text-orange-500">

            <!-- name -->
            <div class="flex items-center">
               <label for="name" class="flex-shrink-0 text-base font-medium text-gray-900 dark:text-white">
                  Doctor's Name : 
               </label>
               <input type="text" name="name" id="name" class="flex-1 ml-2 w-full" placeholder="Your Name" required />
            </div>

            <!-- contact -->
            <div class="flex items-center">
               <label for="email" class="flex-shrink-0 text-base font-medium text-gray-900 dark:text-white">
                  Email : 
               </label>
               <input type="email" name="email" id="email" class="flex-1 ml-2" placeholder="Your Email" required />
               <!---->
               <label for="phone" class="ml-2 flex-shrink-0 text-base font-medium text-gray-900 dark:text-white">
                  Phone : 
               </label>
               <input type="phone" name="phone" id="phone" class="flex-1 ml-2" placeholder="Your Mobile" required />
            </div>

            <!-- registration -->
            <div class="flex items-center">
               <label for="reg" class="flex-shrink-0 text-base font-medium text-gray-900 dark:text-white">
                  Your MRN/BMDC Registration No. : 
               </label>
               <input type="text" name="reg" id="reg" class="flex-1 ml-2 w-full" placeholder="MRN/Registration" required />
            </div>

            <!-- degree-1 -->
            <div class="flex items-center">
               <label for="degree_1" class="flex-shrink-0 text-base font-medium text-gray-900 dark:text-white">
                  Degree [1]: 
               </label>
               <input type="text" name="degree_1" id="degree_1" class="flex-1 ml-2" placeholder="Degree" required />
               <!---->
               <label for="college_1" class="ml-2 flex-shrink-0 text-base font-medium text-gray-900 dark:text-white">
                  Institution : 
               </label>
               <input type="text" name="college_1" id="college_1" class="flex-1 ml-2" placeholder="Institution of this degree"/>
            </div>

            <!-- degree-2 -->
            <div class="flex items-center">
               <label for="degree_2" class="flex-shrink-0 text-base font-medium text-gray-900 dark:text-white">
                  Degree [2]: 
               </label>
               <input type="text" name="degree_2" id="degree_2" class="flex-1 ml-2" placeholder="2nd Degree (Optional)" />
               <!---->
               <label for="college_2" class="ml-2 flex-shrink-0 text-base font-medium text-gray-900 dark:text-white">
                  Institution : 
               </label>
               <input type="text" name="college_2" id="college_2" class="flex-1 ml-2" placeholder="Institution of this degree (Optional)"/>
            </div>

            <!-- details -->
            <div class="flex items-center">
               <label for="visit_time" class="flex-shrink-0 text-base font-medium text-gray-900 dark:text-white">
                  Visit Time : 
               </label>
               <input type="text" name="time" id="visit_time" class="flex-1 ml-2" placeholder="e.g.: 10:00 AM - 6:00 PM"/>
               <!---->
               <label for="chamber" class="ml-2 flex-shrink-0 text-base font-medium text-gray-900 dark:text-white">
                  Chamber Location : 
               </label>
               <input type="text" name="chamber" id="chamber" class="flex-1 ml-2" placeholder="e.g., Model Town Hospital, Savar, Dhaka"/>
               <!---->
               <label for="fee" class="ml-2 flex-shrink-0 text-base font-medium text-gray-900 dark:text-white">
                  Visiting Fee : 
               </label>
               <input type="number" name="fee" id="fee" class="flex-1 ml-2" placeholder="e.g., 500, 750, etc."/>
            </div>

            <!-- Image -->
            <div class="flex items-center">
               <label for="image" class="flex-shrink-0 text-base font-medium text-gray-900 dark:text-white">
                  Your Image : 
               </label>
               <input class="flex-1 ml-2" id="image" type="file" name="image">
            </div>

         </div>

         <!--  -->
         <button name="submit" class="my-4 saveButton">Save</button>

         </div>

      </form>

   </div>

</div>
</x-master>