<template>
    <section id="testimonies" class="py-20 bg-slate-900">
        <div class="max-w-6xl mx-8 md:mx-10 lg:mx-20 xl:mx-auto">


            <div class="transition duration-500 ease-in-out transform scale-100 translate-x-0 translate-y-0 opacity-100">
                <div class="mb-12 space-y-5 md:mb-16 md:text-center">
                    <div
                        class="inline-block px-3 py-1 text-sm font-semibold text-indigo-100 rounded-lg md:text-center text-cn bg-[#202c47] bg-opacity-60 hover:cursor-pointer hover:bg-opacity-40">
                        Words from Others
                    </div>
                    <h1 class="mb-5 text-3xl font-semibold text-white md:text-center md:text-5xl">
                        It's not just us.
                    </h1>
                    <p class="text-xl text-gray-100 md:text-center md:text-2xl">
                        Here's what others have to say about us.
                    </p>
                </div>
            </div>


            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 lg:gap-8">


                <ul class="space-y-8">
                    <TestimonialItem
                    v-for="testimonial in testimonials"
                    :key="testimonial.id"
                    :name="testimonial.name"
                    :occupation="testimonial.occupation"
                    :testimonial="testimonial.text"
                    :imageUrl="testimonial.imageUrl"
                  />
                </ul>


                <ul class="hidden space-y-8 sm:block">
                    <TestimonialItem name="Laura Benson" occupation="Freelance Writer" testimonial="Getting my refund was incredibly easy and fast. Highly recommend this service!" :image-url="imageURL"/>
                    <TestimonialItem name="Raj Patel" occupation="Software Developer" testimonial="The customer service was outstanding and my issue was resolved with a refund promptly." :image-url="imageURL"/>
                    <TestimonialItem name="Sophia Chang" occupation="Graphic Designer" testimonial="I was skeptical at first, but the refund process was straightforward and hassle-free." :image-url="imageURL"/>
                    <TestimonialItem name="Carlos Gomez" occupation="Restaurant Owner" testimonial="This service exceeded my expectations. My refund was processed quickly without any complications." :image-url="imageURL"/>
                  </ul>

                  <ul class="hidden space-y-8 lg:block">
                    <TestimonialItem name="Elena Rodriguez" occupation="Marketing Specialist" testimonial="I appreciated the transparency and efficiency of the refund process. Great job!" :image-url="imageURL"/>
                    <TestimonialItem name="Mohamed Al Fayed" occupation="Business Analyst" testimonial="The team was very supportive and guided me through the refund process smoothly." :image-url="imageURL"/>
                    <TestimonialItem name="Anita Schmidt" occupation="HR Manager" testimonial="I rarely write reviews, but I had to for this service. My refund was processed quicker than I anticipated." :image-url="imageURL"/>
                    <TestimonialItem name="Derek Wong" occupation="Event Coordinator" testimonial="Excellent service! The refund was in my account sooner than expected. Will recommend to others." :image-url="imageURL"/>
                  </ul>


            </div>
        </div>
    </section>
</template>

<script setup>
import TestimonialItem from '@/Components/TestimonialItem.vue';
const testimonials = [
  { id: 1, name: 'Alice Johnson', occupation: 'Freelancer', text: 'The refund process was quick and hassle-free. Highly recommend!', imageUrl: 'https://pbs.twimg.com/profile_images/1375285353146327052/y6jeByyD_400x400.jpg' },
  { id: 2, name: 'Bob Smith', occupation: 'Entrepreneur', text: 'Impressed by the swift response from the support team.', imageUrl: 'https://pbs.twimg.com/profile_images/1375285353146327052/y6jeByyD_400x400.jpg' },
  { id: 3, name: 'Cathy Lee', occupation: 'Designer', text: 'Got my refund processed in no time. Great service!', imageUrl: 'https://pbs.twimg.com/profile_images/1375285353146327052/y6jeByyD_400x400.jpg' },
];

const imageURL = "https://pbs.twimg.com/profile_images/1375285353146327052/y6jeByyD_400x400.jpg";

</script>

<style>

</style>

