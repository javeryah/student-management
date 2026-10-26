pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Build Docker Image') {
            steps {
                sh 'docker build -t student-management-app:${BUILD_NUMBER} .'
            }
        }

        stage('Verify Running App') {
            steps {
                sh 'curl -f http://localhost:8000'
            }
        }
    }
}
