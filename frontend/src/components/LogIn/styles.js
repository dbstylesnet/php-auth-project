import styled from 'styled-components'

const Wrapper = styled.div`
    width: 22%;
    box-sizing: border-box;
    margin: 0 39%;
    background: linear-gradient(150deg, rgb(164, 204, 150) 0%, rgb(249, 239, 239) 100%);
    box-shadow: inset 0px 0px 3px rgba(0, 0, 0, 1);
    min-height: 200px;
    color: black;
    padding: 30px;
    border-radius: 10px;

    form {
    }

    div {
        padding: 0 0 5px;
        label {
            padding: 0 10px 0 0;
        }
    }

    .fieldWrapper {
        display: flex;
        label {
            text-align: right;
            flex: 1;
        }
        input {
            flex: 2;
        }
    }

    .buttons {
        padding: 15px 0 0 0;

        button {
            margin: 0 5px;
        }
    }
`

export { Wrapper }