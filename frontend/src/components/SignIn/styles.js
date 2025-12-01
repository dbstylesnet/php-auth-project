import styled from 'styled-components'

const Wrapper = styled.div`
    width: 100%;
    max-width: 420px;
    box-sizing: border-box;
    margin: 0 auto;
    background: linear-gradient(145deg, #6b46c1 0%, #7c3aed 100%);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5),
                0 0 0 1px rgba(139, 92, 246, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
    min-height: 400px;
    color: #e0e0e0;
    padding: 50px 40px;
    border-radius: 20px;
    position: relative;
    overflow: hidden;

    &::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
    }

    form {
        width: 100%;
    }

    h2 {
        color: #ffffff;
        font-size: 28px;
        font-weight: 600;
        margin: 0 0 10px 0;
        text-align: center;
        letter-spacing: -0.5px;
    }

    .subtitle {
        color: #9ca3af;
        font-size: 14px;
        text-align: center;
        margin-bottom: 35px;
    }

    .imgcontainer {
        text-align: center;
        margin: 0 auto 30px auto;
        position: relative;
        display: inline-block;
        padding: 6px;
        border-radius: 50%;
    }

    .avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        border: 2px solid rgba(139, 92, 246, 0.6);
        object-fit: cover;
        display: block; background: linear-gradient(135deg, #c4b5fd 0%, #ddd6fe 100%);
        filter: contrast(1.1) brightness(0.95);
    }

    div {
        padding: 0 0 20px;
        
        label {
            display: block;
            color: #d1d5db;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
    }

    .fieldWrapper {
        display: flex;
        flex-direction: column;
        margin-bottom: 24px;
        
        label {
            text-align: left;
            margin-bottom: 10px;
        }
        
        input {
            width: 100%;
            padding: 14px 18px;
            background: rgba(139, 92, 246, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: #ffffff;
            font-size: 15px;
            transition: all 0.3s ease;
            box-sizing: border-box;
            
            &::placeholder {
                color: #6b7280;
            }
            
            &:focus {
                outline: none;
                border-color: #667eea;
                background: rgba(102, 126, 234, 0.1);
                box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
            }
            
            &:hover {
                border-color: rgba(255, 255, 255, 0.2);
            }
        }
    }

    .buttons {
        padding: 20px 0 0 0;
        display: flex;
        gap: 12px;

        button {
            flex: 1;
            padding: 14px 24px;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            
            &[type="submit"] {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: #ffffff;
                box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
                
                &:hover:not(:disabled) {
                    transform: translateY(-2px);
                    box-shadow: 0 6px 20px rgba(102, 126, 234, 0.5);
                }
                
                &:active:not(:disabled) {
                    transform: translateY(0);
                }
                
                &:disabled {
                    opacity: 0.5;
                    cursor: not-allowed;
                }
            }
            
            &[type="button"] {
                background: rgba(139, 92, 246, 0.2);
                color: #d1d5db;
                border: 1px solid rgba(255, 255, 255, 0.1);
                
                &:hover:not(:disabled) {
                    background: rgba(139, 92, 246, 0.3);
                    border-color: rgba(255, 255, 255, 0.2);
                }
                
                &:disabled {
                    opacity: 0.4;
                    cursor: not-allowed;
                }
            }
        }
    }

    pre {
        display: none;
    }
`

export { Wrapper }