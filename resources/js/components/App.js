import React from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter, Route, Switch} from 'react-router-dom';

import GlobalNav from './GlobalNav';
import Top from './Top';
import About from './About';
import Main from './Main';

const App = () => {
    return(
        <BrowserRouter>
        <React.Fragment>
            <GlobalNav />
            <Switch>
　　　　　　　　　　{/*完全一致のため、exactを付与*/}
                <Route path="/top" exact component={Top} />
                {/* <Route path="/about" component={About} /> */}
                    {/* propsでaboutというコンポーネントにtomという情報を渡す */}
                <Route path='/About' render={ () => <About name={'Tom'}/> } />
                <Route path='/Main' component={Main} />

            </Switch>
        </React.Fragment>
        </BrowserRouter>
    )
}

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}



