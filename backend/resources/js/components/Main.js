import React from 'react';
import Lesson from './Lesson';

class Main extends React.Component{
    render(){
        const lessonList={
            name:'HTML&CSS',
            image:'https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/react/html.svg',
            introduction:'webpageは最高',
        };
        return(
            <Lesson
                name={lessonList.name}
                image={lessonList.image}
                introduction={lessonList.introduction}
            />
        )
    }
}

export default Main;
