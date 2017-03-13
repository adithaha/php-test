stage 'Checkout'
 node() {
  deleteDir()
  checkout scm
}
stage 'DEV Build'
 node () {
  openshiftBuild(buildConfig: 'phpdev', showBuildLogs: 'true')
}
stage 'DEV Check'
 node () {
  openshiftVerifyBuild(buildConfig: 'phpdev')
}
pipeline {
  agent none
  stages {
    stage("Distributed Tests") {
      steps {
        parallel (
          "Firefox" : {
            node('master') {
              sh "echo from Firefox"
            }
          },
          "Chrome" : {
            node('master') {
              sh "echo from Chrome"
            }
          },
          "IE6 : )" : {
            node('master') {
              sh "echo from IE6"
            }
          }
        )
      }
    }
  }
}
stage 'Promote to QA'
 node () {
   openshiftTag(srcStream: "phpdev", srcTag: "latest", destStream: "phpdev", destTag: "qaready")
}
stage 'QA Check'
 node () {
  openshiftVerifyDeployment(deploymentConfig: 'phpqa')
}
stage 'Promote to PROD'
 node () {
   openshiftTag(srcStream: "phpdev", srcTag: "qaready", destStream: "phpdev", destTag: "prodready")
}
stage 'PROD Check'
 node () {
  openshiftVerifyDeployment(deploymentConfig: 'phpprod')
}
