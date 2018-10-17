<template>
    <div class="media">
        <img class="mr-3" src="http://via.placeholder.com/84x84&text=..." :alt="course.name"/>
        <div class="media-body">
            <ul v-if="course.subjects" class="list-inline">
                <li v-for="subject in course.subjects" :key="subject.id" class="list-inline-item"> {{ subject.name }}</li>
            </ul>
            <h5 class="mt-0">{{ course.name }}</h5>
            <ul class="list-inline">
                <li class="list-inline-item">{{ course.formattedAccess}}</li>
                <li class="list-inline-item">{{ course.formattedDifficulty}}</li>
                <li class="list-inline-item">{{ course.formattedType}}</li>
                <li class="list-inline-item">{{ course.formattedStarted}}</li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        name: "course-partial",
        props: ['course']
    }
</script>

<style scoped>

</style>