import {handleServerError, request} from '../core/request';

export const getCars = async () => {
  try {
    const response = await request.get('cars');
    return [response, null];
  } catch (e) {
    return [null, handleServerError(e)];
  }
};
